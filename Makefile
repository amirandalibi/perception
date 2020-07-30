.PHONY: help start build install tail down

help:
	@echo ""
	@echo "-- Makefile Available Commands --"
	@echo ""
	@echo "   make start:    - build and run containers and install dependencies"
	@echo "   make build:    - build Wordpress and MySQL containers"
	@echo "   make install:  - Install composer dependecies"
	@echo "   make tail:     - follow logs from Wordpress container in terminal"
	@echo "   make down:     - remove all containers and volumes"
	@echo ""
	@echo "---------------------------------"
	@echo ""
 
start:
	./scripts/start.sh

build:
	docker-compose up -d --build

install:
	docker exec -it $$(docker ps -aqf "name=perception_wp") /bin/bash -c "cd wp-content/plugins/perception && composer install --no-suggest --no-scripts"

tail:
	docker log perception_wp -f

down:
	docker-compose down
