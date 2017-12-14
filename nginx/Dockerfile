ARG NGINX_VERSION
FROM nginx:${NGINX_VERSION}

RUN apk update && \
    apk add \
        certbot \
        s6 && \
    rm -rf /var/cache/apk/* && \
    mkdir -p /var/log/s6/cron && \
    mkdir -p /var/log/s6/nginx

COPY s6 /etc/s6
COPY reload_nginx.sh /root/
COPY crontab_certbot /root/
COPY *.conf /etc/nginx/conf.d/
COPY *.html /usr/share/nginx/html/

RUN (crontab -l ; cat /root/crontab_certbot) | crontab -

CMD ["s6-svscan", "/etc/s6"]
