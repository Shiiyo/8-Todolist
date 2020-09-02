# Security Setup
The security system is configured in <code>/config/packages/security.yaml</code>
## 1. Encoders
This part describe the hash used for hash the user's password.
```yaml
encoders:
    App\Entity\User: bcrypt
```
## 2. Providers
The provider explain where is stock the User's information and how to access it.
```yaml
providers:
    doctrine:
        entity:
            class: App:User
            property: username
```
## 3. Firewalls
The firewalls config allow you to set up the way to login and logout. It's our authentication system.
```yaml
firewalls:
    dev:
        pattern: ^/(_(profiler|wdt)|css|images|js)/
        security: false

    main:
         anonymous: ~
        pattern: ^/
        form_login:
            login_path: login
            check_path: login_check
            always_use_default_target_path: true
            default_target_path:  /
        logout: ~
```

## 4. Access Control
On the <code>access_control</code> part we can define the authorisation access for each pages of the website and the users' roles allowed.
```yaml
access_control:
        - { path: ^/tasks, roles: ROLE_USER}
        - { path: ^/users/list, roles: ROLE_ADMIN}
        - { path: ^/login, roles: IS_AUTHENTICATED_ANONYMOUSLY }
```
We can see that we need at least a ROLE_USER for access the tasks part of the website.
The users/list is only accessible by Admin and everbody is allowed on the login page.