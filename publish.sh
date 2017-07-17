#!/usr/bin/env bash

git subsplit update
git subsplit publish "
    src/DeasilWorks/CEF:git@github.com:deasilworks/cef.git
" --heads=master