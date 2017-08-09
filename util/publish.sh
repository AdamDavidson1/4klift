#!/bin/sh

version=1.0

git pull origin $version
git push origin $version
git checkout master
git pull origin master
git merge $version
git push origin master
git subsplit update

# see https://github.com/dflydev/git-subsplit

git subsplit publish "
     src/deasilworks/api:git@github.com:deasilworks/api.git
     src/deasilworks/cef:git@github.com:deasilworks/cef.git
     src/deasilworks/cfg:git@github.com:deasilworks/cfg.git
     src/deasilworks/cms:git@github.com:deasilworks/cms.git
     core:git@github.com:deasilworks/4klift-core.git
     skeleton-se:git@github.com:deasilworks/4klift-se.git
 " --heads="master 1.0"

git checkout $version
git merge master