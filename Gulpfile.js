//Variaveis dos diretorios de arquivos

var filesJS = [
"./Public/Assets/src/js/*.js"
];

var filesCSS = [
"./Public/Assets/src/css/*.css",
"!./Public/Assets/src/css/inc/font-awesome"
];

// Núcleo do Gulp
var gulp = require('gulp');

// Transforma o javascript em formato ilegível para humanos
var uglify = require("gulp-uglify");

// Agrupa todos os arquivos em um
var concat = require("gulp-concat");

// Verifica alterações em tempo real, caso haja, compacta novamente todo o projeto
var watch = require('gulp-watch');

// Minifica o CSS
var cssmin = require("gulp-cssmin");

// Remove comentários CSS
var stripCssComments = require('gulp-strip-css-comments');

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

// Tarefa padrão quando executado o comando GULP
gulp.task('default',['minify-js','minify-css']);

// Tarefa de monitoração caso algum arquivo seja modificado, deve ser executado e deixado aberto, comando "gulp watch".
gulp.task('watch', function() {
  gulp.watch(filesJS, ['minify-js']);
  gulp.watch(filesCSS, ['minify-css']);
});
