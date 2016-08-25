//Variaveis dos diretorios de arquivos

var filesJS = [
"./Public/Assets/src/js/*.js"
];

var filesCSS = [
"!./Public/Assets/src/css/inc/font-awesome/*",
"./Public/Assets/src/css/**/*.css"
];
var filesIMG = [
"./Public/Assets/src/css/img/**/*"
];

// Núcleo do Gulp
const gulp = require('gulp');

// Transforma o javascript em formato ilegível para humanos
const uglify = require("gulp-uglify");

// Agrupa todos os arquivos em um
const concat = require("gulp-concat");

// Verifica alterações em tempo real, caso haja, compacta novamente todo o projeto
const watch = require('gulp-watch');

// Minifica o CSS
const cssmin = require("gulp-cssmin");

// Remove comentários CSS
const stripCssComments = require('gulp-strip-css-comments');

const image = require('gulp-image');

// Processo que removerá comentários CSS e minificará.
gulp.task('minify-css', function(){
	return gulp.src(filesCSS)
	.pipe(stripCssComments({all: true}))
	.pipe(cssmin())
	.pipe(gulp.dest('./Public/Assets/dist/css/'));
});

// Tarefa de minificação do Javascript
gulp.task('minify-js', function () {
  return gulp.src(filesJS)                        // Arquivos que serão carregados, veja variável 'js' no início
  .pipe(uglify())                     // Transforma para formato ilegível
  .pipe(gulp.dest('./Public/Assets/dist/js/'));          // pasta de destino do arquivo(s)
});

// Tarefa de minificação das Imagens
gulp.task('minify-image', function () {
	gulp.src(filesIMG)
	.pipe(image())
	.pipe(gulp.dest('./Public/Assets/dist/css/img/'));
});


// Tarefa de monitoração caso algum arquivo seja modificado, deve ser executado e deixado aberto, comando "gulp watch".
gulp.task('watch', function() {
	gulp.watch(filesJS, ['minify-js']);
	gulp.watch(filesCSS, ['minify-css']);
	gulp.watch(filesIMG, ['minify-image']);
});

// Tarefa padrão quando executado o comando GULP
gulp.task('default',['minify-js','minify-css','minify-image','watch']);