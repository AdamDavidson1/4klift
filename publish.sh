#!/usr/bin/env bash

git pull origin master
git push origin master
git subsplit update
git subsplit publish "
    src/DeasilWorks/CEF:git@github.com:deasilworks/cef.git
" --heads=master