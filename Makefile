SHELL=/bin/bash

.PHONY: help
help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: deptrac-install
deptrac-install: ## Install deptrac tool
	curl -LS https://github.com/sensiolabs-de/deptrac/releases/download/0.8.2/deptrac.phar -o deptrac.phar
	chmod +x deptrac.phar
	$(If you want to create nice dependency graphs, you need to install graphviz:)

.PHONY: architecture-check
architecture-check: ## Run deptrac  (architecture check)
#	php deptrac.phar analyze ci/deptrac/depfile-arch.yaml
	php deptrac.phar analyze ci/deptrac/shared-kernel.yaml
	php deptrac.phar analyze ci/deptrac/core.yaml
	php deptrac.phar analyze ci/deptrac/booking.yaml
	php deptrac.phar analyze ci/deptrac/application.yaml

.PHONY: cs-check
cs-check: ## Run code style analysis (check and report)
	php vendor/bin/php-cs-fixer fix --dry-run --diff

.PHONY: cs-fix
cs-fix: ## Run code style analysis (fix and report)
	php vendor/bin/php-cs-fixer fix -v

.PHONY: test
test: ## Run tests
	php vendor/bin/phpunit

.PHONY: test-coverage
test-coverage: ## Run tests with coverage (html report in var/coverage)
	php vendor/bin/phpunit --coverage-html var/coverage

.PHONY: stan
stan: ## Run static analysis
	php vendor/bin/phpstan analyse