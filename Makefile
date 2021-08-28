local:
	- DOCKER_BUILDKIT=1 docker build -t api_proposta . --network=host
dev:
	- docker-compose up -d
