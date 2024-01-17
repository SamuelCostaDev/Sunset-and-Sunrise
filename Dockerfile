FROM ubuntu:20.04

ENV DEBIAN_FRONTEND=noninteractive
ENV timezone=America/Sao_Paulo

# Instalação do utilitário apt-utils e configuração do fuso horário
RUN apt-get update && \
    apt-get install -y --no-install-recommends apt-utils && \
    apt-get install -y tzdata && \
    ln -snf /usr/share/zoneinfo/${timezone} /etc/localtime && \
    echo ${timezone} > /etc/timezone && \
    dpkg-reconfigure --frontend noninteractive tzdata

# Instalação do Apache, PHP, Git, Xdebug e Composer
RUN apt-get install -y apache2 git php php-xdebug php7.4-mysql && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    rm composer-setup.php && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Copia todos os arquivos do diretório local para o diretório do Apache
COPY ./ /var/www/html

EXPOSE 80

WORKDIR /var/www/html

ENTRYPOINT /etc/init.d/apache2 start && /bin/bash

CMD ["true"]
