import { FTPConfig } from '../config/ftp.js';
import vinylFTP from 'vinyl-ftp';
import util from 'gulp-util';

export const ftp = () => {
	FTPConfig.log = util.log;
	const ftpConnect = vinylFTP.create(FTPConfig);
	return app.gulp.src(`${app.path.buildFolder}/**/*.*`, {})
		.pipe(app.plugins.plumber(
			app.plugins.notify.onError({
				title: "FTP",
				message: "Error: <%= error.message %>"
			}))
		)
		.pipe(ftpConnect.dest(`/${app.path.ftp}/${app.path.rootFolder}`));
}