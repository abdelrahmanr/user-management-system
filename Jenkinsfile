pipeline {
    agent any

    parameters {
        string(name: 'BRANCH_NAME', defaultValue: 'main', description: 'Branch to build')
        choice(name: 'ENVIRONMENT', choices: ['development', 'staging', 'production'], description: 'Choose environment')
        booleanParam(name: 'RUN_TESTS', defaultValue: true, description: 'Run tests before deploy?')
    }

    stages {
        stage('Checkout') {
            steps {
                echo "Cloning branch: ${params.BRANCH_NAME}"
                git branch: "${params.BRANCH_NAME}", url: 'https://github.com/abdelrahmanr/user-management-system.git'
            }
        }

        stage('Build') {
            steps {
                echo "Building project for ${params.ENVIRONMENT} environment..."
                sh 'echo "Build process started..."'
            }
        }

        stage('Test') {
            when {
                expression { return params.RUN_TESTS == true }
            }
            steps {
                echo 'Running tests...'
                sh 'echo "All tests passed successfully!"'
            }
        }

        stage('Deploy') {
            steps {
                echo "Deploying to ${params.ENVIRONMENT} environment..."
                sh 'echo "Deployment done!"'
            }
        }
    }

    post {
        success {
            echo "✅ Build completed successfully!"
        }
        failure {
            echo "❌ Build failed. Please check logs."
        }
    }
}
