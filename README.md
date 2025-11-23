# Loan Calculator WordPress Plugin
## Plugin Structure
Organized plugin structure to keep the app logic and configurations separate:

    loan-calculator/
    ├── php.calculator-loan            // Main plugin file (only for bootstrap)
    ├── composer.json                  // Management for Autoloading
    ├── app/                           // Main plugin logic
    │   ├── Admin/                     // Admin settings page
    │   ├── Common/                    // Shared code and tools
    │   │   └── Utils/                 // Helper Functions
    │   ├── Core/                      // Core classes and plugin bootstrap
    │   │   └── Plugin.php             // Main class that manages everything
    │   ├── Calculator/                // Main logic related to loan calculation
    │   │   ├── BankConfigBase.php     // Abstract class for bank configuration
    │   │   └── CalculatorService.php  // Service that performs loan calculations
    │   ├── Frontend/                  // Everything related to site appearance
    │   │   ├── Shortcode.php          // Class that manages shortcode
    │   │   ├── RestEndpoint.php       // Class that manages REST API
    │   │   └── public/                // CSS and JS files
    │   │       ├── css/
    │   │       └── js/
    │   └──Views/                      // Display Views
    │       └── LoanCalculatorView.php // Loan Calculator Shortcode View
    └── config/                        // Each bank config
        ├── melli-mehrbani.php
        ├── resalat.php
        └── mehr-iran.php

## Base config class

The BaseConfig class is designed to provide a common foundation for all bank configurations. It defines the shared structure and behavior that every loan calculator must support, while allowing each bank to customize its own parameters.

### **common points**:
* bank name(bank identifier)

* send form sections to ui(fields that collect user inputs for calculation)

* result section(output values displayed to the user)

* calculation formula(the formula used to calculate deposit amount)

### **differnces**:
* type and number of inputs in form sections(allthough most of calculations share the same parameters for their formula ,some banks require additional or fewer inputs)

* display result section parameters(the displayed results depend on the bank’s specific inputs and calculation rules, so each config defines its own result schema)

* set of rules and exceptions for each bank(banks might apply special conditions or exceptions that must be handled before the calculations)

* calculation data tables(some banks require factor tables to calculate results, while others use formulas directly)

* display payment list method(some banks calculators come with a table of payments that is shown under the result section)

* extra parameters(e.g. loan guarantor that can be placed in result section)

## Requirements

* Access to formulas or data tables for each bank, or an existing calculator to examine and replicate.

* Required inputs for each bank, including their minimum and maximum values.

* We need a solid UI that can handle the display of input fields and forms, dynamically present the result table and, when required show a detailed payment list.

* Set up a REST API that securely sends form data to the calculation class
