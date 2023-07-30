pipeline {
  agent any
  stages {
    stage('test ') {
      parallel {
        stage('test ') {
          steps {
            sh 'ls -la '
            sh 'echo "chao may cung "'
          }
        }

        stage('phpunit ') {
          steps {
            sh 'php artisan '
          }
        }

      }
    }

  }
}