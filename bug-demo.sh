#!/usr/bin/env bash

# bug-demo.sh — Demo for php-code-coverage v14 coverage regression
#
# Runs the same tests twice:
#   1. ParaTest (1 process)  -> correct statement count
#   2. ParaTest (2 processes) -> incorrect statement count

set -e

mkdir -p var

stmts()   { php -r "\$x=simplexml_load_file('$1'); echo (int)\$x->project->metrics['statements'];"; }
covered() { php -r "\$x=simplexml_load_file('$1'); echo (int)\$x->project->metrics['coveredstatements'];"; }
pct()     { php -r "echo $2 > 0 ? round($1 / $2 * 100, 1) : 0;"; }


# 1 process
echo "Running Paratest (single process)"
vendor/bin/paratest --processes 1 --testdox --coverage-clover var/clover-single.xml --cache-directory var/cache
S=$(stmts var/clover-single.xml)
C=$(covered var/clover-single.xml)
echo "  $C / $S statements = $(pct $C $S)% covered"
echo "-----------------------------------------------------------------------"

# 2 processes
echo "Running Paratest (>1 process)"
vendor/bin/paratest --processes 2 --testdox --coverage-clover var/clover-parallel.xml --cache-directory var/cache
SP=$(stmts var/clover-parallel.xml)
CP=$(covered var/clover-parallel.xml)
echo "  $CP / $SP statements = $(pct $CP $SP)% covered"
echo
