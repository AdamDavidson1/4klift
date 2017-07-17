#!/usr/bin/env bash

git push origin master
git subsplit update
git subsplit publish "
    src/DeasilWorks/CEF:git@github.com:deasilworks/cef.git
" --heads=master