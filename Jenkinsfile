pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Build') {
            steps {
                script {
                    docker.image('php:8.2-cli').inside('-u root') {
                        sh 'rm -f composer.lock'
                        sh 'composer install --no-interaction --prefer-dist'
                    }
                }
            }
        }

        stage('Test') {
            steps {
                script {
                    docker.image('php:8.2-cli').inside('-u root') {
                        sh 'php artisan test'
                    }
                }
            }
        }

        stage('Deploy') {
            steps {
                script {
                    docker.image('ubuntu').inside('-u root') {
                        sh 'echo "Deploying Laravel Application"'
                    }
                }
            }
        }
    }
}
