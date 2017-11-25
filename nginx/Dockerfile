FROM nginx:1.13.7-alpine

RUN apk update && \
    apk add \
        certbot \
        s6 && \
    rm -rf /var/cache/apk/* && \
    mkdir /var/log/s6 && \
    mkdir /var/log/s6/cron && \
    mkdir /var/log/s6/nginx

COPY s6 /etc/s6
COPY reload_nginx.sh /root/
COPY crontab_certbot /root/
COPY *.conf /etc/nginx/conf.d/
COPY *.html /usr/share/nginx/html/

RUN (crontab -l ; cat /root/crontab_certbot) | crontab -

CMD ["s6-svscan", "/etc/s6"]
