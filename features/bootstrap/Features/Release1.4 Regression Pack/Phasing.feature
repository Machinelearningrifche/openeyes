  @phasing @regression
  Feature: Create New Phasing Event
  In order to cover every possible route throughout the site
  As an automation tester
  I want to build a template with supporting code for each web page

  Scenario: Login and create a Phasing Event

    Given I am on the OpenEyes "master" homepage
    And I enter login credentials "admin" and "admin"
    And I select Site "1"
    Then I select a firm of "3"

    Then I search for hospital number "1009465 "

    Then I select the Latest Event

    Then I expand the Glaucoma sidebar
    And I add a New Event "Phasing"

    Then I choose a right eye Intraocular Pressure Instrument  of "1"
    Then I choose a right eye Intraocular Pressure Instrument  of "2"
    Then I choose a right eye Intraocular Pressure Instrument  of "3"
    Then I choose a right eye Intraocular Pressure Instrument  of "5"
    Then I choose a right eye Intraocular Pressure Instrument  of "4"
    And I choose right eye Dilation of Yes

    Then I choose a right eye Intraocular Pressure Reading Time of "14:00"
    Then I choose a right eye Intraocular Pressure Reading of "5"
    And I add right eye comments of "Right eye comments here"

    Then I choose a left eye Intraocular Pressure Instrument  of "1"
    Then I choose a right eye Intraocular Pressure Instrument  of "2"
    Then I choose a right eye Intraocular Pressure Instrument  of "3"
    Then I choose a right eye Intraocular Pressure Instrument  of "5"
    Then I choose a right eye Intraocular Pressure Instrument  of "4"

    And I choose left eye Dilation of Yes

    Then I choose a left eye Intraocular Pressure Reading Time of "14:42"
    Then I choose a left eye Intraocular Pressure Reading of "7"
    And I add left eye comments of "Left eye comments here"

    Then I Save the Phasing Event
