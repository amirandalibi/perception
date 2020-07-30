FROM wordpress:latest

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN apt-get update && apt-get install -y \
        git \
        zip \
        unzip
