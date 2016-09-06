var gulp        = require('gulp')
   ,browserSync = require('browser-sync')
   ,reload      = browserSync.reload


var root = './*'

gulp.task('refresh', function () {
  gulp.src(root)
    .pipe(reload({ stream:true }))
})

gulp.task('browser-sync', function () {
  browserSync.init({
    proxy:'localhost:8888'
  })
})

gulp.task('watch', function () {
  gulp.watch(root, ['refresh'])
})

gulp.task('default', ['watch', 'browser-sync'])
