FROM nginx:1.13.6-alpine

RUN apk update && \
    apk add certbot s6 && \
    mkdir /var/log/s6 && \
    mkdir /var/log/s6/cron && \
    mkdir /var/log/s6/nginx

COPY s6 /s6
COPY crontab_certbot /root/
COPY *.conf /etc/nginx/conf.d/

RUN (crontab -l ; cat /root/crontab_certbot) | crontab -

CMD ["s6-svscan", "/s6"]
