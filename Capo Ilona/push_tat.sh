#!/bin/bash

if [ -z "$1" ]; then
    echo "Commit: "
    echo "Usage : ./push_that 'Votre message de commit'"
    exit 1
fi

git add .

git commit -m "$1"

git push origin ilona

echo "Commit et push effectués avec succès."
