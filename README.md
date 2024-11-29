# Docker Skeletons for Application Deployment

This repository contains basic Docker configurations and scripts for deploying various types of web applications.

[//]: # (The examples provided cover popular technologies such as **Laravel &#40;PHP&#41;**, **Node.js &#40;Express&#41;**, **Python &#40;Flask&#41;**, and **Static Websites &#40;Nginx&#41;**, enabling easy deployment with Docker.)

## Supported Technologies

- **Laravel (PHP-FPM + Nginx)** – A popular PHP framework for building modern web applications.

[//]: # (- **Node.js &#40;Express.js&#41;** – A minimal and fast web framework for building scalable network applications.)
[//]: # (- **Python &#40;Flask&#41;** – A lightweight WSGI web application framework in Python.)
[//]: # (- **Static Websites &#40;Nginx&#41;** – Easily deploy static content using the fast and efficient Nginx web server.)

## Quick Start Guide

Follow these simple steps to build and deploy your Dockerized application:

### 1. Clone the Repository

First, clone the repository to your local machine:

```bash
  git clone https://github.com/yourusername/project-docker-skeletons.git
  cd project-docker-skeletons
```

### 2. Build the Docker Image

Navigate to the project directory of your choice and build the Docker image for your application.

- For **Laravel (PHP-FPM + Nginx)**:

```bash
  cd laravel-docker
  docker build -f docker/Dockerfile -t laravel-docker-image:v1 .
```

### 3. Run the Docker Container

Once the image is built, you can run the application in a Docker container:

```bash
  docker rm -f laravel-docker-container
  docker run -it -d -p 127.0.0.1:9090:80 --name laravel-docker-container laravel-docker-image:v1
```

### 4. Access Your Application

Once the container is running, you can access your application via the following URLs:

- For **Laravel**: 127.0.0.1:9090

