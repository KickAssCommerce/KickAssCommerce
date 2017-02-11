# KickAss Commerce philosophy

## Architecture

#### Domain oriented paths
Classes are ordered by their domain. Anything concerning products (except bridge classes) can be find in `src/Product`.
Wondering where you can find a class? Just think of what domain it belongs to.


## Libraries
Why did we choose the libraries we did

#### SlimPHP
we needed a basic and easy to use library for routing. SlimPHP is battle tested, fast to implement and offers just the 
right features we needed. Which was mainly routing

#### DotEnv
Every application needs configuration. DotEnv offers an easy way to read `.env` files which are, for now, good enough
for credentials, basic feature flags and other small settings

#### Symfony serializer
Because we love to convert anything to everything and nothing beats Symfony serializer