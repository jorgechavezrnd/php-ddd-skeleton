Feature: Create a new course
  In order to have courses on the platform
  As a user with admin permissions
  I want to create a new course

  Scenario: A valid non existing course
    Given I send a PUT request to "/courses/de23424c-7720-436a-95f4-81a3081b1ba4" with body:
    """
    {
      "name": "The best course",
      "duration": "5 hours"
    }
    """
    Then the response status code should be 201
    And the response should be empty
