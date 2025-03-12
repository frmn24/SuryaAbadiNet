pipeline {
    agent any

    environment {
        DB_CONNECTION = 'mysql'
        DB_HOST = '127.0.0.1'
        DB_PORT = '3306'
        DB_DATABASE = 'laravel'
        DB_USERNAME = 'root'
        DB_PASSWORD = 'root'
    }

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Build') {
            steps {
                script {
                    docker.image('composer:2.6').inside('-u root') {
                        sh '''
                            cp .env.example .env || true
                            rm -f composer.lock
                            composer install --no-interaction --prefer-dist
                        '''
                    }
                }
            }
        }

        stage('Prepare Environment') {
            steps {
                script {
                    docker.image('php:8.2-cli').inside('-u root') {
                        sh '''
                            apt-get update && apt-get install -y unzip
                            docker-php-ext-install pdo pdo_mysql
                            docker-php-ext-enable pdo_mysql
                            php -m | grep pdo_mysql
                        '''
                    }
                }
            }
        }

        stage('Set APP_KEY') {
            steps {
                script {
                    docker.image('php:8.2-cli').inside('-u root') {
                        sh '''
                            php artisan key:generate
                        '''
                    }
                }
            }
        }

        stage('Wait for Database') {
            steps {
                script {
                    docker.image('php:8.2-cli').inside('-u root') {
                        sh '''
                            echo "Waiting for MySQL to be ready..."
                            until mysql -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" -e "SELECT 1"; do
                                sleep 1
                            done
                            echo "MySQL is ready!"
                        '''
                    }
                }
            }
        }

        stage('Database Migration') {
            steps {
                script {
                    docker.image('php:8.2-cli').inside('-u root') {
                        sh '''
                            php artisan migrate --force
                        '''
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
                    docker.image('php:8.2-fpm').inside('-u root') {
                        sh '''
                            php artisan config:cache
                            php artisan route:cache
                            php artisan migrate --force
                        '''
                    }
                }
            }
        }
    }

    post {
        success {
            echo '✅ Build and Deployment Successful!'
        }
        failure {
            echo '❌ Build or Deployment Failed!'
        }
    }
}
