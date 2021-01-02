FROM microservice-demo-base

LABEL maintainer="Wilson.Li <494747693@qq.com>" version="1.0" license="MIT" app.name="Inventory"

WORKDIR /opt/www

COPY . /opt/www
RUN composer install --no-dev -o && php bin/hyperf.php

EXPOSE 9501

ENTRYPOINT ["php", "/opt/www/bin/hyperf.php", "start"]

