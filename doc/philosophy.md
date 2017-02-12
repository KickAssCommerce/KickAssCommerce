# KickAss Commerce philosophy

## But... why?
Because developers always think they can do it better themselves.

APIs are cool. And building an eCommerce framework based on APIs sounded really cool.
This started as an experiment trying out the [Moltin](https://www.moltin.com/) service and turned into a project
to try out shiny and new PHP stuff. A proof of concept to show the world eCommerce doesn't have to be monolithic. 

We're not trying to replace existing eCommerce systems but augment them in a way that offers you, the developer, 
the ability to use the libraries you want, the Javascript framework you want and anything else you want to try out.

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

#### Go! AOP
You want to add business logic? Of course you do! Just DONT EDIT THE CORE! Put that stuff in the `app` directly using 
Aspects brought to you by Go! AOP. Check out 