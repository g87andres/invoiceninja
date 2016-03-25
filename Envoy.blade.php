@servers(['web' => 'smileoutloud@solphotobooths.com'])

@task('deploy', ['on' => 'web'])
    cd /home/smileoutloud/solphotobooths.com
    php artisan down
    git pull origin master
    composer install
    gulp --production
    php artisan migrate --force
    php artisan up
@endtask