.DEFAULT_GOAL := help

help:
	@echo "Some helper tasks for managing this project"

seed:
	@php artisan migrate:fresh
	@php artisan db:seed --class="Database\Seeders\AdminAccount"
	@php artisan db:seed --class="Database\Seeders\DatabaseSeeder"
