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

## Builder ##
```bash
docker compose exec php php bin/console gof:singleton
```

## Prototype ##
```bash
docker compose exec php php bin/console gof:prototype
```
## Adapter ##
```bash
docker compose exec php php bin/console gof:gof:adapter
```
