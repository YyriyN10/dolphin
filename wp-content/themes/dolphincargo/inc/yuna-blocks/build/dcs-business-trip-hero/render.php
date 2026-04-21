<?php
	/**
	 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
	 */
?>

<?php if( !empty($attributes['blockTitle']) ):?>
	<?php
	$blockAttr = get_block_wrapper_attributes();
	?>

  <section <?php echo $blockAttr; ?>
    <?php if( !empty($attributes['bloсkZindex']) ):?>
      style="z-index: <?php echo $attributes['bloсkZindex'];?>"
    <?php endif;?>
  >
    <style>

      <?php if (!empty($attributes['desktopBackgroundImageUrl'])):?>
      .wp-block-dcs-business-trip-hero{
        background-image: url(<?php echo $attributes['desktopBackgroundImageUrl'];?>);
      }
      <?php endif;?>

      <?php if( !empty($attributes['bigBackgroundImageUrl']) ):?>
      @media (min-width: 2001px) {
        .wp-block-dcs-business-trip-hero{
          background-image: url(<?php echo $attributes['bigBackgroundImageUrl'];?>);
        }
      }
      <?php endif;?>


      <?php if( !empty($attributes['desktopBackgroundImageUrl']) ):?>
      @media (max-width: 2000px) {
        .wp-block-dcs-business-trip-hero{
          background-image: url(<?php echo $attributes['desktopBackgroundImageUrl'];?>);
        }
      }
      <?php endif;?>

      <?php if( !empty($attributes['mobileBackgroundImageUrl']) ):?>
      @media (max-width: 575px) {
        .wp-block-dcs-business-trip-hero{
          background-image: url(<?php echo $attributes['mobileBackgroundImageUrl'];?>);
        }
      }
      <?php endif;?>
    </style>
    <div class="container-fluid custom-container">
      <div class="row">
        <div class="content col-12">
					<?php if( !empty($attributes['starsCount']) || !empty($attributes['casesCount'])):?>
            <div class="about-cases">
							<?php if( !empty($attributes['starsCount']) ):?>
                <div class="rating-wrapper">
									<?php if( $attributes['starsCount'] == 1 ):?>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_2122_8261)">
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint0_linear_2122_8261)"/>
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint1_linear_2122_8261)"/>
                      </g>
                      <defs>
                        <linearGradient id="paint0_linear_2122_8261" x1="9.9999" y1="0.0154114" x2="9.9999" y2="19.9856" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#F7D55D"/>
                          <stop offset="1" stop-color="#C07305"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_2122_8261" x1="-0.0126421" y1="2.33654" x2="20.0323" y2="5.828" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#FF7A1B"/>
                          <stop offset="1" stop-color="#FB4F05"/>
                        </linearGradient>
                        <clipPath id="clip0_2122_8261">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>
									<?php endif;?>
									<?php if( $attributes['starsCount'] == 2 ):?>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_2122_8261)">
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint0_linear_2122_8261)"/>
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint1_linear_2122_8261)"/>
                      </g>
                      <defs>
                        <linearGradient id="paint0_linear_2122_8261" x1="9.9999" y1="0.0154114" x2="9.9999" y2="19.9856" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#F7D55D"/>
                          <stop offset="1" stop-color="#C07305"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_2122_8261" x1="-0.0126421" y1="2.33654" x2="20.0323" y2="5.828" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#FF7A1B"/>
                          <stop offset="1" stop-color="#FB4F05"/>
                        </linearGradient>
                        <clipPath id="clip0_2122_8261">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_2122_8262)">
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint0_linear_2122_8262)"/>
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint1_linear_2122_8262)"/>
                      </g>
                      <defs>
                        <linearGradient id="paint0_linear_2122_8262" x1="9.9999" y1="0.0154114" x2="9.9999" y2="19.9856" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#F7D55D"/>
                          <stop offset="1" stop-color="#C07305"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_2122_8262" x1="-0.0126421" y1="2.33654" x2="20.0323" y2="5.828" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#FF7A1B"/>
                          <stop offset="1" stop-color="#FB4F05"/>
                        </linearGradient>
                        <clipPath id="clip0_2122_8262">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>
									<?php endif;?>
									<?php if( $attributes['starsCount'] == 3 ):?>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_2122_8261)">
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint0_linear_2122_8261)"/>
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint1_linear_2122_8261)"/>
                      </g>
                      <defs>
                        <linearGradient id="paint0_linear_2122_8261" x1="9.9999" y1="0.0154114" x2="9.9999" y2="19.9856" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#F7D55D"/>
                          <stop offset="1" stop-color="#C07305"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_2122_8261" x1="-0.0126421" y1="2.33654" x2="20.0323" y2="5.828" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#FF7A1B"/>
                          <stop offset="1" stop-color="#FB4F05"/>
                        </linearGradient>
                        <clipPath id="clip0_2122_8261">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_2122_8262)">
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint0_linear_2122_8262)"/>
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint1_linear_2122_8262)"/>
                      </g>
                      <defs>
                        <linearGradient id="paint0_linear_2122_8262" x1="9.9999" y1="0.0154114" x2="9.9999" y2="19.9856" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#F7D55D"/>
                          <stop offset="1" stop-color="#C07305"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_2122_8261" x1="-0.0126421" y1="2.33654" x2="20.0323" y2="5.828" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#FF7A1B"/>
                          <stop offset="1" stop-color="#FB4F05"/>
                        </linearGradient>
                        <clipPath id="clip0_2122_8262">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_2122_8263)">
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint0_linear_2122_8263)"/>
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint1_linear_2122_8263)"/>
                      </g>
                      <defs>
                        <linearGradient id="paint0_linear_2122_8263" x1="9.9999" y1="0.0154114" x2="9.9999" y2="19.9856" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#F7D55D"/>
                          <stop offset="1" stop-color="#C07305"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_2122_8261" x1="-0.0126421" y1="2.33654" x2="20.0323" y2="5.828" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#FF7A1B"/>
                          <stop offset="1" stop-color="#FB4F05"/>
                        </linearGradient>
                        <clipPath id="clip0_2122_8263">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>
									<?php endif;?>
									<?php if( $attributes['starsCount'] == 4 ):?>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_2122_8261)">
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint0_linear_2122_8261)"/>
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint1_linear_2122_8261)"/>
                      </g>
                      <defs>
                        <linearGradient id="paint0_linear_2122_8261" x1="9.9999" y1="0.0154114" x2="9.9999" y2="19.9856" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#F7D55D"/>
                          <stop offset="1" stop-color="#C07305"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_2122_8261" x1="-0.0126421" y1="2.33654" x2="20.0323" y2="5.828" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#FF7A1B"/>
                          <stop offset="1" stop-color="#FB4F05"/>
                        </linearGradient>
                        <clipPath id="clip0_2122_8261">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_2122_8262)">
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint0_linear_2122_8262)"/>
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint1_linear_2122_8262)"/>
                      </g>
                      <defs>
                        <linearGradient id="paint0_linear_2122_8262" x1="9.9999" y1="0.0154114" x2="9.9999" y2="19.9856" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#F7D55D"/>
                          <stop offset="1" stop-color="#C07305"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_2122_8261" x1="-0.0126421" y1="2.33654" x2="20.0323" y2="5.828" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#FF7A1B"/>
                          <stop offset="1" stop-color="#FB4F05"/>
                        </linearGradient>
                        <clipPath id="clip0_2122_8262">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_2122_8263)">
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint0_linear_2122_8263)"/>
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint1_linear_2122_8263)"/>
                      </g>
                      <defs>
                        <linearGradient id="paint0_linear_2122_8263" x1="9.9999" y1="0.0154114" x2="9.9999" y2="19.9856" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#F7D55D"/>
                          <stop offset="1" stop-color="#C07305"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_2122_8263" x1="-0.0126421" y1="2.33654" x2="20.0323" y2="5.828" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#FF7A1B"/>
                          <stop offset="1" stop-color="#FB4F05"/>
                        </linearGradient>
                        <clipPath id="clip0_2122_8263">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_2122_8264)">
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint0_linear_2122_8264)"/>
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint1_linear_2122_8264)"/>
                      </g>
                      <defs>
                        <linearGradient id="paint0_linear_2122_8264" x1="9.9999" y1="0.0154114" x2="9.9999" y2="19.9856" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#F7D55D"/>
                          <stop offset="1" stop-color="#C07305"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_2122_8264" x1="-0.0126421" y1="2.33654" x2="20.0323" y2="5.828" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#FF7A1B"/>
                          <stop offset="1" stop-color="#FB4F05"/>
                        </linearGradient>
                        <clipPath id="clip0_2122_8264">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>
									<?php endif;?>
									<?php if( $attributes['starsCount'] == 5 ):?>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_2122_8261)">
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint0_linear_2122_8261)"/>
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint1_linear_2122_8261)"/>
                      </g>
                      <defs>
                        <linearGradient id="paint0_linear_2122_8261" x1="9.9999" y1="0.0154114" x2="9.9999" y2="19.9856" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#F7D55D"/>
                          <stop offset="1" stop-color="#C07305"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_2122_8261" x1="-0.0126421" y1="2.33654" x2="20.0323" y2="5.828" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#FF7A1B"/>
                          <stop offset="1" stop-color="#FB4F05"/>
                        </linearGradient>
                        <clipPath id="clip0_2122_8261">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_2122_8262)">
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint0_linear_2122_8262)"/>
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint1_linear_2122_8262)"/>
                      </g>
                      <defs>
                        <linearGradient id="paint0_linear_2122_8262" x1="9.9999" y1="0.0154114" x2="9.9999" y2="19.9856" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#F7D55D"/>
                          <stop offset="1" stop-color="#C07305"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_2122_8262" x1="-0.0126421" y1="2.33654" x2="20.0323" y2="5.828" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#FF7A1B"/>
                          <stop offset="1" stop-color="#FB4F05"/>
                        </linearGradient>
                        <clipPath id="clip0_2122_8262">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_2122_8263)">
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint0_linear_2122_8263)"/>
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint1_linear_2122_8263)"/>
                      </g>
                      <defs>
                        <linearGradient id="paint0_linear_2122_8263" x1="9.9999" y1="0.0154114" x2="9.9999" y2="19.9856" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#F7D55D"/>
                          <stop offset="1" stop-color="#C07305"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_2122_8263" x1="-0.0126421" y1="2.33654" x2="20.0323" y2="5.828" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#FF7A1B"/>
                          <stop offset="1" stop-color="#FB4F05"/>
                        </linearGradient>
                        <clipPath id="clip0_2122_8263">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_2122_8264)">
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint0_linear_2122_8264)"/>
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint1_linear_2122_8264)"/>
                      </g>
                      <defs>
                        <linearGradient id="paint0_linear_2122_8264" x1="9.9999" y1="0.0154114" x2="9.9999" y2="19.9856" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#F7D55D"/>
                          <stop offset="1" stop-color="#C07305"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_2122_8264" x1="-0.0126421" y1="2.33654" x2="20.0323" y2="5.828" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#FF7A1B"/>
                          <stop offset="1" stop-color="#FB4F05"/>
                        </linearGradient>
                        <clipPath id="clip0_2122_8264">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_2122_8265)">
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint0_linear_2122_8265)"/>
                        <path d="M19.4692 7.15333L13.3208 6.21416L10.565 0.344161C10.3592 -0.094172 9.64 -0.094172 9.43417 0.344161L6.67917 6.21416L0.530834 7.15333C0.0258337 7.23083 -0.175833 7.845 0.178334 8.20749L4.645 12.7858L3.58917 19.2583C3.505 19.7725 4.05417 20.1583 4.50833 19.9058L10 16.8708L15.4917 19.9067C15.9417 20.1567 16.4958 19.7783 16.4108 19.2592L15.355 12.7867L19.8217 8.20833C20.1758 7.845 19.9733 7.23083 19.4692 7.15333Z" fill="url(#paint1_linear_2122_8265)"/>
                      </g>
                      <defs>
                        <linearGradient id="paint0_linear_2122_8265" x1="9.9999" y1="0.0154114" x2="9.9999" y2="19.9856" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#F7D55D"/>
                          <stop offset="1" stop-color="#C07305"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_2122_8265" x1="-0.0126421" y1="2.33654" x2="20.0323" y2="5.828" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#FF7A1B"/>
                          <stop offset="1" stop-color="#FB4F05"/>
                        </linearGradient>
                        <clipPath id="clip0_2122_8265">
                          <rect width="20" height="20" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>
									<?php endif;?>
                </div>
							<?php endif;?>
							<?php if( !empty($attributes['casesCount']) ):?>
                <p class="cases-text"><?php echo $attributes['casesCount'];?></p>
							<?php endif;?>
            </div>
					<?php endif;?>
					<?php if( !empty($attributes['blockTitle'])):?>
            <h1 class="main-title"><?php echo $attributes['blockTitle'];?></h1>
					<?php endif;?>
					<?php if( !empty($attributes['blockText'])):?>
            <p class="slogan-text"><?php echo $attributes['blockText'];?></p>
					<?php endif;?>
					<?php if ( !empty( $attributes['btnText'] ) ):?>
            <div class="button orange-btn" data-toggle="modal" data-target="#formModal">
							<?php echo $attributes['btnText'];?>
            </div>
					<?php endif;?>
        </div>
      </div>
    </div>
  </section>

<?php endif;?>


