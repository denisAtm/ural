import gulp from "gulp";

// import path
import { path } from "./gulp/config/path.js";

// import gulp plugins
import { plugins } from "./gulp/config/plugins.js";

// passing values to global variable
global.app = {
	isBuild: process.argv.includes('--build'),
	isDev: !process.argv.includes('--build'),
	path: path,
	gulp: gulp,
	plugins: plugins
}

// import gulp tasks
import { copy } from "./gulp/tasks/copy.js";
import { clean } from "./gulp/tasks/clean.js";
import { html } from "./gulp/tasks/html.js";
import { serve } from "./gulp/tasks/serve.js";
import { styles } from "./gulp/tasks/styles.js";
import { js } from "./gulp/tasks/js.js";
import { images } from "./gulp/tasks/images.js";
import { fonts } from "./gulp/tasks/fonts.js";
import { svgSprites } from "./gulp/tasks/svgSprites.js";
import { ftp } from "./gulp/tasks/ftp.js";

// task watcher
function watcher() {
	gulp.watch(path.watch.files, copy);
	gulp.watch(path.watch.html, html); 
	gulp.watch(path.watch.styles, styles);
	gulp.watch(path.watch.js, js);
	gulp.watch(path.watch.images, images);
}

// main tasks const
const mainTasks = gulp.parallel(copy,html,styles,js,images,fonts,svgSprites);

// completion of tasks
const dev = gulp.series(clean,mainTasks,gulp.parallel(watcher, serve));
const build = (clean, mainTasks);
const deployFTP = gulp.series(clean, mainTasks, ftp);

// tasks export
export { dev }
export { build }
export { svgSprites }
export { deployFTP }

gulp.task('default', dev);