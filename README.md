# Symfony practice #
The goal of this project is to demonstrate the ability to design and develop Symfony applications following the best industry standards.
It includes: 
 - Implementation of GoF (Gang of Four) design patterns within a DDD (Domain-Driven Design) application structure.
# Installation #
## Init hosts ##
```aiignore
127.0.0.1 symfon-practice.local
```
## Run project ##
```bash
docker compose up -d
```

# GOF patterns commands #
## Factory Method ##
```bash
docker compose exec php php bin/console gof:factory-method email 'Hello GOF!'

```
## Abstract Factory ##
```bash
docker compose exec php php bin/console gof:abstract-factory paypal 5
```
## Builder ##
```bash
docker compose exec php php bin/console gof:builder checkout cus_123
```

## Singleton ##
```bash
docker compose exec php php bin/console gof:singleton
```

## Prototype ##
```bash
docker compose exec php php bin/console gof:prototype
```
## Adapter ##
```bash
docker compose exec php php bin/console gof:adapter
```
## Decorator ##
```bash
docker compose exec php php bin/console gof:decorator
```
## Facade ##
```bash
docker compose exec php php bin/console gof:facade
```
## Proxy ##
```bash
docker compose exec php php bin/console gof:proxy 1 2 1 3 2
```
