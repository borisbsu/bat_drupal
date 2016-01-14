# Welcome to BAT for Drupal

BAT stands for Booking and Availability Management Tools.

[BAT](https://github.com/roomify/bat) on its own is a PHP library that provides some of the core functionality required to build a booking and availability management system.

BAT for Drupal is a wrapper and UI around BAT. It is build by the [Roomify.us](https://roomify.us) team to provide a foundation through which a wide range of availability management, reservation and booking use cases can be addressed. BAT for Drupal will work with both Drupal 7 and Drupal 8.

BAT builds on our experience with [Rooms](http://drupal.org/project/rooms), which handles the problem of bookings specifically for the accommodation for rental use case(vacation rentals, hotels, B&B, etc). BAT is essentially a tool to allow you to build modules like Rooms and much much more. It handles events with daily or down to the minute granularity. 

As such BAT is a **booking and availability management framework** - much in the same way Drupal is a content management framework and Drupal Commerce is an e-commerce framework. Our aim is to build specific solutions on top of BAT to tackle specific application domains.


# Objectives

BAT aims to address the following tasks.

- **Define bookable things**. Entities that could represent anything within an application domain that have information associated with them about what *state* they find themselves in any given period of time. In addition, you may also need to associate *pricing information* related to the cost of changing the *availability state* a *thing* over a given time (e.g. booking a hotel room for a few nights).

- **Manage availability states**. *Bookable things* will find themselves in various states (e.g. "available to book", "unavailable", "currently in use by Bruce", etc). BAT allows you to define such states and provides both GUI-based tools (e.g. interactive calendars) as well as API-based tools to change such states (because machines want to have fun too).

- **Search for available things**.  Given a time range, a set of acceptable availability states, and an arbitrary number of other search filters BAT should be able to answer question such as: "BAT, is the car available to pick up from the cave at 4pm today, thanks - Robin".

- **Determine cost of booking**. At any given time and given state things will have a cost to change from one state to another (e.g. go from "car sitting in cave" to "car being used by Robin". This cost for the change in state (i.e. a booking) is determined using tools that BAT provides to define what the pricing terms will be.


# Installation

## Dependencies

### PHP Libraries
The core booking and availability management functionality is provided through a PHP library called BAT also developed by Roomify. The required version is described in the composer.json file in the root of the module. The library is available on [Github](https://github.com/roomify/bat) and through [Packagist](https://packagist.org/packages/roomify/bat).

### Drupal Modules

Before enabling BAT you are going to need to download the following modules
- Date
- Date Popup
- JQuery Update
- Libraries
- Variable
- XAutoload
- Composer Manager
- Views Megarow

### External Libraries

To display calendars and dates we use the following libraries:

- Fullcalendar - http://fullcalendar.io/ - You need to [download the following zip](https://github.com/arshaw/fullcalendar/releases/download/v2.6.0/fullcalendar-2.6.0.zip) an unpack in libraries in a directory called fullcalendar
- Fullcalendar Scheduler - http://fullcalendar.io/ - You need to [download the following zip](https://github.com/fullcalendar/fullcalendar-scheduler/releases/download/v1.2.0/fullcalendar-scheduler-1.2.0.zip) an unpack in libraries in a directory called fullcalendar-scheduler
- MomentJS - http://momentjs.com/ - The [moment.js](http://momentjs.com/downloads/moment.min.js) library should be placed in sites/all/libraries so that you end up with the file located here: sites/all/libraries/moment/moment.min.js

## Configuration
 - Enable all the BAT modules
 - The BAT API module is in a separate project - http://drupal.org/project/bat_api - and you need branch 7.x-2.x
 - Make sure to set the jQuery for the admin theme to at least 1.10 by visiting *admin/config/development/jquery_update*

### Creating Bat Units
The first thing you will want to do is create a bookable unit which you can then manage the availability of.

Visit *admin/config/bat/unit-bundles* to create a unit. Bookable units are basic entities that you can manage the permissions off and add any fields you require.

### Pricing
To add price information to your bookable units you will need to:
- Add a Commerce Price field to your Bookable Unit Entity Bundle.
- Under *bat/config/unit-bundles/<yourunitbundle>* make sure that you have the correct price field selected under the pricing tab.
