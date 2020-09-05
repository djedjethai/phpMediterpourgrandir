# Inspired by https://github.com/bokysan/docker-postfix

# Alpine 3.10 ships with Postfix 3.4.7
FROM alpine:3.10

# Install dependencies
RUN apk add --no-cache --update postfix cyrus-sasl cyrus-sasl-plain ca-certificates bash && \
    apk add --no-cache --upgrade musl musl-utils && \
    # Clean up
    (rm "/tmp/"* 2>/dev/null || true) && (rm -rf /var/cache/apk/* 2>/dev/null || true)

# Mark used folders
# VOLUME [ "/var/spool/postfix", "/etc/postfix" ]

# Expose mail submission agent port
EXPOSE 25

# Configure Postfix on startup
COPY ./docker-entrypoint.sh /usr/local/bin
# ENTRYPOINT ["docker-entrypoint.sh"]
RUN chmod -R 711 /usr/local/bin

ENTRYPOINT /usr/local/bin/docker-entrypoint.sh

# Start postfix in foreground mode
CMD ["postfix", "start-fg"]
