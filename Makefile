SHELL=/bin/bash

HOSTNAME:=foobar.restaurant.localhost
HOSTS_ENTRY:=127.0.0.1 ${HOSTNAME}

.PHONY: hosts-entry
ifeq ($(PLATFORM), $(filter $(PLATFORM), Darwin Linux))
hosts-entry:
	(grep "$(HOSTS_ENTRY)" /etc/hosts) || echo '$(HOSTS_ENTRY)' | sudo tee -a /etc/hosts
else
hosts-entry:
	$(warning Make sure to add "${HOSTS_ENTRY}" to your operating system's hosts file)
endif



.PHONY: deptrac-install
deptrac-install:
	curl -LS https://github.com/sensiolabs-de/deptrac/releases/download/0.8.2/deptrac.phar -o deptrac.phar
	chmod +x deptrac.phar
	$(If you want to create nice dependency graphs, you need to install graphviz:)

.PHONY: architecture-check
architecture-check:
	php deptrac.phar analyze ci/deptrac/depfile-arch.yaml

.PHONY: cs-check
cs-check:
	php vendor/bin/php-cs-fixer fix --dry-run --diff

.PHONY: cs-fix
cs-fix:
	php vendor/bin/php-cs-fixer fix -v

.PHONY: test
test:
	php vendor/bin/phpunit

.PHONY: test-coverage
test-coverage:
	php vendor/bin/phpunit --coverage-html var/coverage

.PHONY: stan
stan:
	php vendor/bin/phpstan analyse restaurant/ --level max