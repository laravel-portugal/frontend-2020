pipeline {
  environment {
    registry = 'reg.laravel.pt'
    imageName = 'myapp'
    productionServerIp = credentials('productionServerIp')
    // Using returnStdout
    CC = """${sh(
            returnStdout: true,
            script: 'echo "clang"'
        )}""" 
    // Using returnStatus
    EXIT_STATUS = """${sh(
            returnStatus: true,
            script: 'exit 1'
        )}"""
  }
  agent any
  stages {
    stage('Cloning Git') {
      steps {
        git branch: 'master', url: 'git@github.com:ijpatricio/myapp.git'
        sh "ls -la"
      }
    }
    stage('php dependencies') {
      steps {
        script {
          def composer = docker.image('composer:2')
          def php = docker.image('php:7.4-fpm')
          def node = docker.image('node:14-alpine')
          php.pull()
          composer.pull()
          composer.inside {
              sh "composer install"
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
        sshagent ( credentials: ['JenkinsStgLaravel']) {
          sh '''ssh -o StrictHostKeyChecking=no root@$productionServerIp << EOL
            cd myapp
            TAG=$BUILD_NUMBER docker-compose up -d
          '''
        }
      }
    }
  }
}
