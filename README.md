## Install

1. Copy env.example to .env file

```
composer run-script post-root-package-install --no-interaction
```

2. Configure .env file

```
USER_ID=1000
GROUP_ID=1000
USER_NAME=root
GROUP_NAME=root
```

3. Run install shell script

```
deployment/local/scripts/install.sh
```

4. Update host file

```
127.0.0.1	nux-game.local
```
