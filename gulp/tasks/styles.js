import dartSass from "sass";
import gulpSass from "gulp-sass";
import rename from "gulp-rename";


import mincss from "gulp-clean-css";
import groupmedia from "gulp-group-css-media-queries";
import autoprefixer from "gulp-autoprefixer";


const sass = gulpSass(dartSass);


export const styles = () => {
	return app.gulp.src(app.path.src.styles, { sourcemaps: app.isDev })
		.pipe(app.plugins.plumber(
			app.plugins.notify.onError({
				title: "SCSS",
				message: "Error: <%= error.message %>"
			})))
		.pipe(app.plugins.replace(/@img\//g, '../resources/images/'))
		.pipe(sass({
			outputStyle: 'expanded'
		}))
		.pipe(
			app.plugins.if(
				app.isBuild,
				groupmedia()
			)
		)
		.pipe(
			app.plugins.if(
				app.isBuild,
				autoprefixer({
					grid: true,
                    flexbox: false,
					overrideBrowserslist: ["last 2 versions"],
					cascade: false
				})
			)
		)
		// uncomment if you need unminified css
		.pipe(app.gulp.dest(app.path.build.styles))
		.pipe(
			app.plugins.if(
				app.isBuild,
				mincss({
                    level: {
                        1: {
                            specialComments: 0,
                            removeEmpty: true,
                            removeWhitespace: true,
                        },
                        2: {
                            mergeMedia: true,
                            removeEmpty: true,
                            removeDuplicateFontRules: true,
                            removeDuplicateMediaBlocks: true,
                            removeDuplicateRules: true,
                            removeUnusedAtRules: false,
                        },
                    },
                })
			)
		)
		.pipe(rename({
			extname: ".min.css"
		}))
		.pipe(app.gulp.dest(app.path.build.styles))
		.pipe(app.plugins.browsersync.stream());
}
