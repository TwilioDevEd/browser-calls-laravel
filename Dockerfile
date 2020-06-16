FROM php:7.4

WORKDIR /usr/src/app

RUN apt-get update && \
  apt-get upgrade -y && \
  apt-get install -y git
RUN apt-get install -y zip unzip

COPY composer* ./
RUN curl --silent --show-error https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer


COPY . .
RUN make install

EXPOSE 8000

CMD [ "php", "artisan", "serve", "--host=0.0.0.0" ]
