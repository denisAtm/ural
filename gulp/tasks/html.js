import fileInclude from "gulp-file-include";
import { htmlValidator } from "gulp-w3c-html-validator";


export const html = () => {
    return app.gulp.src(app.path.src.html)
    .pipe(app.plugins.plumber(
        app.plugins.notify.onError({
            title: "HTML",
            message: "Error: <%= error.message %>"
        }))
    )
        .pipe(htmlValidator.analyzer())
        .pipe(htmlValidator.reporter())
        .pipe(fileInclude())
        .pipe(app.plugins.replace(/@img\//g, 'resources/images/'))
        .pipe(app.gulp.dest(app.path.build.html))
        .pipe(app.plugins.browsersync.stream());
};
