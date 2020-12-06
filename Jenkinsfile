pipeline {
  environment {
    registry = 'hub.sidecar.laravel.pt'
    imageName = 'frontend'
  }
  agent any
  stages {
    stage('php dependencies') {
      steps {
        script {
          def composer = docker.image('composer:2')
          def php = docker.image('hub.sidecar.laravel.pt/frontbase:1')
          php.pull()
          composer.pull()
          composer.inside {
              // to remove the need for the ignore, lets make our base image.
              sh "composer install --ignore-platform-reqs"
          }
          php.inside {
            sh "cp .env.example .env"
            sh "php artisan key:generate"
          }
        }
      }
    }
    stage('Building image') {
      steps{
        script {
          dockerImage = docker.build("$registry/$imageName:$BUILD_NUMBER")
          docker.withRegistry("https://$registry") {
            dockerImage.push("$BUILD_NUMBER")
            dockerImage.push("latest")
          }
        }
      }
    }
    stage('Deploy in production') {
      steps {
        sshagent ( credentials: ['artisanpt-ssh']) {
          sh '''ssh -o StrictHostKeyChecking=no root@www.sidecar.laravel.pt << EOL
            cd laravel.pt
            TAG=$BUILD_NUMBER docker-compose up -d
          '''
        }
      }
    }
  }
}
