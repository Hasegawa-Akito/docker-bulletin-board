FROM mysql:8.0

ENV MYSQL_DATABASE=sg_db \
  MYSQL_USER=sg \
  MYSQL_PASSWORD=sg \
  MYSQL_ROOT_PASSWORD=sg \
  TZ=Asia/Tokyo

COPY ./my.cnf /etc/mysql/conf.d/my.cnf
RUN chmod 644 /etc/mysql/conf.d/my.cnf