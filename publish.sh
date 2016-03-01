#!/bin/bash

VERSION=$(date +%y.%m.%d)

do_rsync () {
  rsync -aP --delete --exclude ".git"  --exclude "node*" "site/" "release"
}

do_clone () {
  git clone git@github.com:intentaware/c3p0.git --branch release --single-branch release
}

do_push () {
  git push origin
}

do_release_management () {
  cd "release"
  git add "." && git commit -m $VERSION
  git tag -a $VERSION -m $VERSION
  git push && git push --tags
  cd ".."
}

do_deploy () {
  cd "trellis"
  ./publish.sh
}


if [ -d release/ ] ; then
  do_rsync
  do_release_management
  do_deploy
else
  do_clone
  do_rsync
  do_release_management
  do_deploy
fi
