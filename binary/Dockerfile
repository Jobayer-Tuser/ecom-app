FROM --platform=linux/amd64 dunglas/frankenphp:static-builder as builder

RUN composer install --no-dev --ignore-platform-reqs --optimize-autoloader -a

#Build the static binary, be sure to select only the PHP extensions you want

WORKDIR /go/src/app

RUN EMBED=dist/app/ \
    PHP_EXTENSIONS=ctype,curl,dom,mbstring,posix,pcnt7,intl,iconv,pdo_sqlite,gd,zip,intl,opcache \
    ./build-static.sh

FROM alpine:3.19.0

WORKDIR /app

COPY --from=builder /go/src/app/dist/frankenphp-linux-x86_64 laravel-app

EXPOSE 80

CMD ["./laravel-app", "php-server"]
