module.exports = {
  apps: [
    {
      name: 'thelaunch',
      script: 'npm',
      args: '--name "thelaunch" -- run prod',
      watch: true,
      watch_delay: 1000,
      ignore_watch: ['node_modules'],
      watch_options: {
        followSymlinks: false,
      },
      instances: 4,
      exec_mode: 'cluster',
      env: {
        NODE_ENV: 'development',
      },
      env_production: {
        NODE_ENV: 'production',
      },
    },
  ],
}
