import * as nodePath from 'path';
const rootFolder = nodePath.basename(nodePath.resolve());

const buildFolder = `./build`; 
const srcFolder = `./src`;

export const path = {
	src: {
		js: `${srcFolder}/js/main.js`,
		images: `${srcFolder}/resources/images/**/*.{jpg,jpeg,png,gif,tiff,svg}`,
		favicons:`${srcFolder}/resources/favicons/*.{jpg,jpeg,png,gif,tiff,svg}`,
		styles: `${srcFolder}/styles/main.{scss,sass}`,
		html: `${srcFolder}/html/pages/*.html`, 
		files: `${srcFolder}/resources/files/**/*.*`,
		fonts: `${srcFolder}/resources/fonts/**/*`,
		svgSprites: `${srcFolder}/resources/svgSprites/*.svg`
	},
	build: {
		js: `${buildFolder}/js/`,
		images: `${buildFolder}/resources/images/`,
		styles: `${buildFolder}/styles/`,
		html: `${buildFolder}/`,
		favicons:`${buildFolder}/resources/favicons/`,
		files: `${buildFolder}/files/`,
		fonts: `${buildFolder}/fonts/`,
		svgSprites: `${buildFolder}/resources/svgSprites/`
	},
	watch: {
		js: `${srcFolder}/js/**/*.js`,
		styles: `${srcFolder}/styles/**/*.{scss,sass}`,
		html: [`${srcFolder}/html/pages/**/*.html`, `${srcFolder}/html/parts/**/*.html`],
		images: `${srcFolder}/resources/images/**/*.{jpg,jpeg,png,svg,gif,ico,webp}`,
		files: `${srcFolder}/resources/files/**/*.*`
	},
	clean: buildFolder,
	buildFolder: buildFolder,
	srcFolder: srcFolder,
	rootFolder: rootFolder,
	ftp: ``
}