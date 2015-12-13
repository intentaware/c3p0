#!/bin/bash

# This program is free software. It comes without any warranty, to
# the extent permitted by applicable law. You can redistribute it
# and/or modify it under the terms of the Do What The Fuck You Want
# To Public License, Version 2, as published by Sam Hocevar. See
# http://sam.zoy.org/wtfpl/COPYING for more details.

# for fgbg in 38 48 ; do #Foreground/Background
#   for color in {0..256} ; do #Colors
#     #Display the color
#     printf "\e[${fgbg};5;${color}m ${color}\t\e[0m"
#     #Display 10 colors per lines
#     if [ $((($color + 1) % 10)) == 0 ] ; then
#       printf "\n"
#     fi
#   done
#   printf "\n\n"
# done

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


if [ -d release/ ] ; then
  do_rsync
  do_release_management
else
  do_clone
  do_rsync
  do_release_management
fi
