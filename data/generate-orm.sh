#!/bin/bash

# Generate models from DB
./vendor/doctrine/doctrine-module/bin/doctrine-module orm:convert-mapping --namespace="RestApi\\Model\\" --force  --from-database annotation ./module/RestApi/src/
./vendor/doctrine/doctrine-module/bin/doctrine-module orm:generate-entities ./module/RestApi/src/ --generate-annotations=true