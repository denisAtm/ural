import favicon from "gulp-favicons";


export const favicons = () => {
    return app.gulp.src(app.path.src.favicons)
    .pipe(app.plugins.plumber(
        app.plugins.notify.onError({
            title: "Favicons",
            message: "Error: <%= error.message %>"
        })))
        .pipe(
            app.plugins.if(
                app.isBuild,
                favicon({
                    icons: {
                        appleIcon: true,
                        favicons: true,
                        online: true,
                        appleStartup: true,
                        android: true,
                        firefox: true,
                        yandex: true,
                        windows: true,
                        coast: true,
                    },
                }),
            )
        )
        .pipe(gulp.dest(app.path.build.favicons))
};
