FROM postgres

RUN apt-get -q update && apt-get -qy install netcat
ADD https://raw.githubusercontent.com/eficode/wait-for/master/wait-for /bin/wait-for
RUN chmod +x /bin/wait-for

COPY db/pgdb.psql .
COPY db/seed.sh .

RUN echo "./seed.sh &" > async-seed.sh && chmod +x async-seed.sh seed.sh

ENTRYPOINT ./async-seed.sh && docker-entrypoint.sh postgres